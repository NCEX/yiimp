
#include <stdint.h>
#include <stdlib.h>
#include <string.h>
#include <stdio.h>

#include "../sha3/sph_types.h"
#include "../sha3/sph_keccak.h"

void keccak256_hash(const char *input, char *output, uint32_t len)
{
	uint32_t hash[16];

	sph_keccak256_context ctx_keccak;

	sph_keccak256_init(&ctx_keccak);
	sph_keccak256(&ctx_keccak, input, len );
	sph_keccak256_close(&ctx_keccak, hash);

	memcpy(output, hash, 32);
}

