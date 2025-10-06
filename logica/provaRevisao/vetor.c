#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int vetor[5];
    int i;

    for(i = 0; i < 5; i++) {
        vetor[i] = i * 2;
        printf("%d X 2 = %d\n", i, vetor[i]);
    }

    printf("Digite o valor da segunda posição do vetor: ");
    scanf("%d", &vetor[1]);

    printf("Vetor atualizado: \n");
    for(i = 0; i < 5; i++) {
        printf("[%d] - %d\n", i, vetor[i]);
    }

    return 0;
}