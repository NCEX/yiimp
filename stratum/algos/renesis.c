// Copyright (c) 2009-2010 Satoshi Nakamoto
// Copyright (c) 2009-2012 The Bitcoin developers
// Distributed under the MIT/X11 software license, see the accompanying
// file COPYING or http://www.opensource.org/licenses/mit-license.php.
// Copyright (c) 2018, hav0k Renesis Developers & Renesis Group
// This is the pre-fork hash for Renesis.
// http://renesis.io
#include <stdlib.h>
#include <stdint.h>
#include <string.h>
#include <stdio.h>

#include "renesis.h"

#include "../sha3/sph_skein.h"
#include "../sha3/sph_keccak.h"
#include "../sha3/sph_simd.h"
#include "../sha3/sph_shavite.h"
#include "../sha3/sph_jh.h"
#include "../sha3/sph_cubehash.h"
#include "../sha3/sph_fugue.h"
#include "../sha3/sph_gost.h"

 enum Algo {
    SKEIN = 0,
    KECCAK,
    SIMD,
    SHAVITE,
	JH,
    CUBEHASH,
    FUGUE,
    GOST,
	HASH_FUNC_COUNT
};

static const int TOTAL_CYCLES = 8; 

static uint8_t get_first_algo(const uint32_t* prevblock) {
    uint8_t* data = (uint8_t*)prevblock;
    return data[7] >> 4;
}

void renesis_hash(const char* input, char* output, uint32_t len)
{
	unsigned char hash[128];
    uint8_t curr_algo;
	
 	sph_skein512_context     ctx_skein;
	sph_keccak512_context    ctx_keccak;
	sph_simd512_context      ctx_simd;
	sph_shavite512_context   ctx_shavite;
	sph_jh512_context        ctx_jh;
	sph_cubehash512_context  ctx_cubehash;
	sph_fugue512_context	 ctx_fugue;
	sph_gost512_context	 ctx_gost;
 	
	const void *in = input;
    int size = len;

    uint32_t *in32 = (uint32_t*) input;

    // initial algo = first digit of prev block hashorder (cheers, x16r)
    curr_algo = get_first_algo(&in32[1]);
	
	for (int i = 0; i < TOTAL_CYCLES; i++)
    {
        // Only 4 test algos yet
        switch (curr_algo) {
            case SKEIN:
                sph_skein512_init(&ctx_skein);
                sph_skein512(&ctx_skein, in, size);
                sph_skein512_close(&ctx_skein, hash);
                break;
            case KECCAK:
                sph_keccak512_init(&ctx_keccak);
                sph_keccak512(&ctx_keccak, in, size);
                sph_keccak512_close(&ctx_keccak, hash);
                break;
            case SIMD:
                sph_simd512_init(&ctx_simd);
                sph_simd512(&ctx_simd, in, size);
                sph_simd512_close(&ctx_simd, hash);
                break;
            case SHAVITE:
                sph_shavite512_init(&ctx_shavite);
                sph_shavite512(&ctx_shavite, in, size);
                sph_shavite512_close(&ctx_shavite, hash);
                break;
            case JH:
                sph_jh512_init(&ctx_jh);
                sph_jh512(&ctx_jh, in, size);
                sph_jh512_close(&ctx_jh, hash);
                break;
            case CUBEHASH:
                sph_cubehash512_init(&ctx_cubehash);
                sph_cubehash512(&ctx_cubehash, in, size);
                sph_cubehash512_close(&ctx_cubehash, hash);
                break;
            case FUGUE:
                sph_fugue512_init(&ctx_fugue);
                sph_fugue512(&ctx_fugue, in, size);
                sph_fugue512_close(&ctx_fugue, hash);
                break;
            
        }
        // next algos = first digit on prev hash
        curr_algo = (uint8_t)hash[0] % HASH_FUNC_COUNT;
        in = (void*)hash;
        size = 64;
    }
	
	memcpy(output, hash, 32);
}
