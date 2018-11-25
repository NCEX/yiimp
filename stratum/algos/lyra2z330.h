#ifndef LYRA2Z330_H
#define LYRA2Z330_H

#ifdef __cplusplus
extern "C" {
#endif

#include <stdint.h>

void lyra2z330_hash(void *state, const void *input, uint32_t height);


#ifdef __cplusplus
}
#endif

#endif