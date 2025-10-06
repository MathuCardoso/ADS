#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int i = 0, num[10], vetorInv[10];

    for(; i < 10; i++) {
        printf("Digite o %dº número do vetor: ", i + 1);
        scanf("%d", &num[i]);
    }

    for(int cont = 0, i = 9; i >= 0; i--, cont++) {
        vetorInv[cont] = num[i];

        printf("%d\n", vetorInv[cont]);
    }

    return 0;
}