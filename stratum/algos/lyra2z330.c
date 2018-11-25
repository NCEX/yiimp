#include <memory.h>
#include <stdlib.h>
#include <stdint.h>
#include <string.h>
#include <stdio.h>

#include "Lyra2-z.h"

#define _ALIGN(x) __attribute__ ((aligned(x)))

//__thread uint64_t* lyra2z330_wholeMatrix;

void lyra2z330_hash(void *state, const void *input, uint32_t height)
{
	uint32_t _ALIGN(256) hash[16];

        LYRA2z(  hash, 32, input, 80, input, 80, 2, 330, 256 );

	memcpy(state, hash, 32);
}
