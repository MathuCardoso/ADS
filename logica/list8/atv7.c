#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int i = 0, vetorV[20], posMaior = 0, posMenor = 0;

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
            posMaior = i;
            posMenor = i;
        } else {
            if(vetorV[i] < vetorV[posMenor]) {
                posMenor = i;
            }
            if(vetorV[i] > vetorV[posMaior]) {
                posMaior = i;
            }
        }
    }

    printf("\nEste é o valor do maior elemento do Vetor V: %d", vetorV[posMaior]);
    printf("\nEsta é sua posição no vetor: [%d]", posMaior);

    printf("\n\nEste é o valor do menor elemento do Vetor V: %d", vetorV[posMenor]);
    printf("\nEsta é sua posição no vetor: [%d]", posMenor);

    return 0;
}