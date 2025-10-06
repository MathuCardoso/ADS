#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");

    int i, vetorA[10] = {1,2,3,4,5,6,7,8,9,10}, vetorB[10];

    for(i = 0; i < 10; i++) {
        if(vetorA[i] % 2 == 0) {
            vetorB[i] = vetorA[i] * 5;
        } else if(vetorA[i] % 2 != 0) {
            vetorB[i] = vetorA[i] + 5;
        }

        printf("%d\n", vetorB[i]);
    }
    
    return 0;
}