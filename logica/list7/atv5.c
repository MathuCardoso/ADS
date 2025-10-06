#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int n, vIn, vFi, nPos = 0, sPos = 0, nPar = 0, sPar = 0, nImp = 0, sImp = 0, nImpDiv = 0, sImpDiv = 0;

    float media;

    printf("Digite o valor inicial da lista: ");
    scanf("%d", &vIn);

    printf("Digite o valor final da lista: ");
    scanf("%d", &vFi);

    for (n = vIn; n <= vFi; n++){
        
        if (n > 0) {
            nPos++;
            sPos+=n;
        }
        
        if (n % 2 == 0) {
            nPar++;
            sPar+=n;
        }
        
        if (n % 2 != 0) {
            nImp++;
            sImp+=n;
        }
        
        if (n % 2 != 0 && (n % 3 == 0 && n % 4 == 0)) {
            nImpDiv++;
            sImpDiv+=n;
        }
        
    }

    if(nPos > 0) {
        media = (float)sPos / nPos;
        printf("\nQuantidade de números inteiros e positivos: %d\n", nPos);
        printf("Média dos número sinteiros e positivos: %.2f\n\n", media);
    } else {
        printf("Nenhum número inteiro e positivo.\n\n");
    }

    if(nPos > 0) {
        media = (float)sPar / nPar;
        printf("Quantidade de números pares: %d\n", nPar);
        printf("Média dos números pares: %.2f\n\n", media);
    } else {
        printf("Nenhum número par.\n\n");
    }

    if(nPos > 0) {
        media = (float)sImp / nImp;
        printf("Quantidade de números ímpares: %d\n", nImp);
        printf("Média dos números ímpares: %.2f\n\n", media);
    } else {
        printf("Nenhum número ímpar.\n\n");
    }

    if(nPos > 0) {
        media = (float)sImpDiv / nImpDiv;
        printf("Quantidade de números ímpares e divisíveis por 3 e 4 ao mesmo tempo: %d\n", nImpDiv);
        printf("Média dos números ímpares e divisíveis por 3 e 4 ao mesmo tempo: %.2f\n\n", media);    
    } else {
        printf("Nenhum número ímpar divisível por 3 e 4 ao mesmo tempo.\n\n");
    }

    return 0;
}