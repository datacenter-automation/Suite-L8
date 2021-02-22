<?php

namespace App\General;

use RuntimeException;

/**
 * Class UniqueIdentifier.
 *
 *
 * @todo Keep working on this.
 */
class UniqueIdentifier
{

    /**
     * The prime number that is used to convert a number to a unique other number within the maximum range.
     *
     * @var int
     */
    protected int $prime;

    /**
     * The prime number that is one larger than the maximum number that can be converted to a code.
     *
     * @var int
     */
    protected int $maxPrime;

    /**
     * The suffix that will be added to every code.
     *
     * @var null|string
     */
    protected ?string $suffix;

    /**
     * The prefix that will be added to every code.
     *
     * @var null|string
     */
    protected ?string $prefix;

    /**
     * The delimiter that separates the different parts of the generated code.
     *
     * @var null|string
     */
    protected ?string $delimiter;

    /**
     * The size of every part of the generated code.
     *
     * @var null|int
     */
    protected ?int $splitLength;

    /**
     * The list of characters that a generated code can contain.
     *
     * @var string
     */
    protected string $characters;

    /**
     * The length of the code.
     *
     * @var int
     */
    protected int $length;

    /**
     * Set the prime number.
     *
     * @param int $prime
     *
     * @return $this
     */
    public function setPrime(int $prime): static
    {
        $this->prime = $prime;

        return $this;
    }

    /**
     * Set the max prime number.
     *
     * @param int $maxPrime
     *
     * @return $this
     */
    public function setMaxPrime(int $maxPrime): static
    {
        $this->maxPrime = $maxPrime;

        return $this;
    }

    /**
     *  Set the suffix.
     *
     * @param string $suffix
     *
     * @return $this
     */
    public function setSuffix(string $suffix): static
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * Set the prefix.
     *
     * @param string $prefix
     *
     * @return $this
     */
    public function setPrefix(string $prefix): static
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Set the delimiter.
     *
     * @param string   $delimiter
     * @param int|null $splitLength
     *
     * @return $this
     */
    public function setDelimiter(string $delimiter, int $splitLength = null): static
    {
        $this->delimiter = $delimiter;
        $this->splitLength = $splitLength;

        return $this;
    }

    /**
     * Set the characters.
     *
     * @param $characters
     *
     * @return $this
     */
    public function setCharacters($characters): static
    {
        if (is_array($characters)) {
            $characters = implode('', $characters);
        }

        $this->characters = $characters;

        return $this;
    }

    /**
     * Set the length.
     *
     * @param int $length
     *
     * @return $this
     */
    public function setLength(int $length): static
    {
        $this->length = $length;

        return $this;
    }

    /**
     *  Generate the necessary amount of codes.
     *
     * @param int      $start
     * @param int|null $end
     * @param bool     $toArray
     *
     * @return mixed
     */
    public function generate(int $start, int $end = null, bool $toArray = false): mixed
    {
        $this->validateInput($start, $end);

        $generator = (function () use ($start, $end) {
            for ($i = $start; $i <= ($end ?? $start); $i ++) {
                $number = $this->obfuscateNumber($i);
                $string = $this->encodeNumber($number);

                yield $this->constructCode($string);
            }
        })();

        if ($end === null) {
            return iterator_to_array($generator)[0];
        }

        if ($toArray) {
            return iterator_to_array($generator);
        }

        return $generator;
    }

    /**
     * Map number to a unique other number smaller than the max prime number.
     *
     * @param int $number
     *
     * @return int
     */
    protected function obfuscateNumber(int $number): int
    {
        return ($number * $this->prime) % $this->maxPrime;
    }

    /**
     * Encode number into characters.
     *
     * @param int $number
     *
     * @return string
     */
    protected function encodeNumber(int $number): string
    {
        $string = '';
        $characters = $this->characters;

        for ($i = 0; $i < $this->length; $i ++) {
            $digit = $number % strlen($characters);

            $string .= $characters[$digit];
            $characters = strtr($characters, [$characters[$digit] => '']);

            $number = $number / strlen($characters);
        }

        return $string;
    }

    /**
     * Construct the code.
     *
     * @param $string
     *
     * @return string
     */
    protected function constructCode($string): string
    {
        $code = '';

        if ($this->prefix !== null) {
            $code .= $this->prefix . $this->delimiter;
        }

        if ($this->splitLength !== null) {
            $code .= implode($this->delimiter, str_split($string, $this->splitLength));
        } else {
            $code .= $string;
        }

        if ($this->suffix !== null) {
            $code .= $this->delimiter . $this->suffix;
        }

        return $code;
    }

    /**
     * Check if all property values are valid.
     *
     * @param int      $start
     * @param int|null $end
     */
    protected function validateInput(int $start, int $end = null)
    {
        if (empty($this->prime)) {
            throw new RuntimeException('Prime number must be specified');
        }

        if (empty($this->maxPrime)) {
            throw new RuntimeException('Max prime number must be specified');
        }

        if (empty($this->characters)) {
            throw new RuntimeException('Character list must be specified');
        }

        if (empty($this->length)) {
            throw new RuntimeException('Length must be specified');
        }

        if ($this->prime >= $this->maxPrime) {
            throw new RuntimeException('Prime number must be smaller than the max prime number');
        }

        if (strlen($this->characters) <= $this->length) {
            throw new RuntimeException('The size of the character list must be bigger or equal to the length of the code');
        }

        if (count(array_unique(str_split($this->characters))) !== strlen($this->characters)) {
            throw new RuntimeException('The character list can not contain duplicates');
        }

        if ($this->getMaximumUniqueCodes() <= $this->maxPrime) {
            throw new RuntimeException('The length of the code is too short or the character list is too small to create the number of unique codes equal to the max prime number');
        }

        if ($start <= 0) {
            throw new RuntimeException('The start number must be bigger than zero');
        }

        if ($end !== null && $end >= $this->maxPrime) {
            throw new RuntimeException('The end number can not be bigger or equal to the max prime number');
        }
    }

    /**
     * Get the maximum amount of unique codes that can create based the characters.
     *
     * @return float|int
     */
    protected function getMaximumUniqueCodes(): float|int
    {
        $maxCombinations = 1;

        for ($i = 0; $i < $this->length; $i ++) {
            $maxCombinations = $maxCombinations * (strlen($this->characters) - $i);
        }

        return $maxCombinations;
    }
}
