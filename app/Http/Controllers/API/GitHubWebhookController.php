<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\UpdateDocumentationJob;
use Illuminate\Http\Request;

class GitHubWebhookController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function handleDocsHook(Request $request)
    {
        $this->validateGithubWebhook(config('app.docs.github_webhook_secret'), $request);

        $repository = $this->detectRepositoryName($request->get("repository"));

        dispatch(new UpdateDocumentationJob($repository));
    }

    /**
     * @param array $repository
     *
     * @return string
     */
    private function detectRepositoryName(array $repository): string
    {
        if (array_key_exists("full_name", $repository)) {
            return $repository["full_name"];
        }

        abort(400, 'Invalid payload');
    }

    /**
     * @param string                   $token
     * @param \Illuminate\Http\Request $request
     */
    private function validateGithubWebhook(string $token, Request $request)
    {
        if (($signature = $request->headers->get('X-Hub-Signature')) == null) {
            abort(400, 'Signature header is not set.');
        }

        $signatureData = explode('=', $signature);

        if (count($signatureData) !== 2) {
            abort(400, 'Signature format is invalid.');
        }

        $webhookSignature = hash_hmac('sha1', $request->getContent(), $token);

        if (! hash_equals($webhookSignature, $signatureData[1])) {
            abort(401, 'Could not verify request signature ' . $signatureData[1]);
        }
    }
}
