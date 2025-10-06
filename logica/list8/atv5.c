#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int i = 0, vetorV[20], pos = 0;

    for(; i < 20; i++) {
        printf("\nDigite o %dº número do vetor: ", i + 1);
        scanf("%d", &vetorV[i]);

        if(vetorV[i] < 0) {
            while(vetorV[i] < 0) {
                printf("\nO número precisa ser positivo. Tente noamente: ");
                scanf("%d", &vetorV[i]);
            }
        }

        if(i == 0) {
            pos = i;
        } else if(vetorV[i] > vetorV[pos]) {
            pos = i;
        }
    }

    printf("\nEste é o valor do maior elemento do Vetor V: %d", vetorV[pos]);
    printf("\nEsta é sua posição no vetor: [%d]", pos);

    return 0;
}