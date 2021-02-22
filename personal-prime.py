import http.client
import itertools
import json
import os

from dotenv import load_dotenv
load_dotenv()

p = os.getenv("RNDPRIME_P")
b = os.getenv("RNDPRIME_B")
main = os.getenv("RNDPRIME_MAIN")

if p is not None or b is not None or main is not None:
    exit()

def multiply(num1, num2):
    len1 = len(num1)
    len2 = len(num2)
    if len1 == 0 or len2 == 0:
        return "0"

    result = [0] * (len1 + len2)

    i_n1 = 0
    i_n2 = 0

    for i in range(len1 - 1, -1, -1):
        carry = 0
        n1 = ord(num1[i]) - 48
        i_n2 = 0

        for j in range(len2 - 1, -1, -1):
            n2 = ord(num2[j]) - 48
            summ = n1 * n2 + result[i_n1 + i_n2] + carry
            carry = summ // 10
            result[i_n1 + i_n2] = summ % 10
            i_n2 += 1

        if (carry > 0):
            result[i_n1 + i_n2] += carry

        i_n1 += 1

    i = len(result) - 1
    while (i >= 0 and result[i] == 0):
        i -= 1

    if (i == -1):
        return "0"

    s = ""
    while (i >= 0):
        s += chr(result[i] + 48)
        i -= 1

    return s

def new_prime():
    PrimeList = []

    for _ in itertools.repeat(None, 4):
        conn = http.client.HTTPSConnection("2ton.com.au")
        conn.request("GET", "/getprimes/random/8192", None, {'Content-type': 'application/json'})
        r1 = conn.getresponse()
        response = r1.read()
        jsonPayload = response.decode('utf8').replace("'", '"')
        jsonLoaded = json.loads(jsonPayload)

        if 'p' in jsonLoaded:
            PrimeList.append(jsonLoaded['p']['base10'])


    RNDPRIME_P = multiply(PrimeList[0], PrimeList[1])
    RNDPRIME_B = multiply(PrimeList[2], PrimeList[3])

    RNDPRIME_MAIN = multiply(RNDPRIME_P, RNDPRIME_B)


    with open(".env", "a") as f:
        f.write("\n")
        f.write("RNDPRIME_P=" + RNDPRIME_P + "\n")
        f.write("RNDPRIME_B=" + RNDPRIME_B + "\n")
        f.write("RNDPRIME_MAIN=" + RNDPRIME_MAIN + "\n")
        f.write("\n")

    return RNDPRIME_MAIN

new_prime()

# Exit.
