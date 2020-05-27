#include <stdlib.h>
#include <stdint.h>
#include <string.h>
#include <stdio.h>
#include "../sha3/sph_blake.h"
#include "../sha3/sph_keccak.h"
#include "../sha3/sph_skein.h"
#include "../sha3/sph_bmw.h"
#include "Lyra2.h"

void lyra2TDC_hash(const char* input, char* output, uint32_t len)
{
	uint32_t hashA[8], hashB[8];

    sph_blake256_context ctx_blake;
    sph_keccak256_context ctx_keccak;
    sph_skein256_context ctx_skein;
    sph_bmw256_context ctx_bmw;

    sph_blake256_init(&ctx_blake);
    sph_blake256(&ctx_blake, input, len); /* 80 */
    sph_blake256_close(&ctx_blake, hashA);

    sph_keccak256_init(&ctx_keccak);
    sph_keccak256(&ctx_keccak, hashA, 32);
    sph_keccak256_close(&ctx_keccak, hashB);

    LYRA2(hashA, 32, hashB, 32, hashB, 32, 1, 4, 4);

    sph_skein256_init(&ctx_skein);
    sph_skein256(&ctx_skein, hashA, 32);
    sph_skein256_close(&ctx_skein, hashB);

    sph_bmw256_init(&ctx_bmw);
    sph_bmw256(&ctx_bmw, hashB, 32);
    sph_bmw256_close(&ctx_bmw, hashA);

    memcpy(output, hashA, 32);
}

