#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int i;

    for(i = 32; i <= 126; i++) {
        printf("%d -> %c -> %x\n", i, i, i);
    }

    return 0;
}