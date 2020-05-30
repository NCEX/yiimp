#ifndef LYRA2TDC_H
#define LYRA2TDC_H

#ifdef __cplusplus
extern "C" {
#endif

#include <stdint.h>

void lyra2TDC_hash(const char* input, char* output, uint32_t len);

#ifdef __cplusplus
}
#endif

#endif