#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int i = 0, vetorA[5] = {1,2,3,4,5}, vetorB[5];

    for (; i < 5; i++) {
        vetorB[i] = vetorA[i] * 2;
        printf("Dobro de %d é %d\n", vetorA[i], vetorB[i]);
    }
    
    return 0;
}