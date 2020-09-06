#ifndef CURVE_H
#define CURVE_H

#ifdef __cplusplus
extern "C" {
#endif

#include <stdint.h>

void sha256hash(const char* input, char* output, uint32_t len);
void curve_hash(const char* input, char* output, uint32_t len);

#ifdef __cplusplus
}
#endif

#endif
