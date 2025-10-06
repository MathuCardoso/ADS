#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <string.h>
#define TAM 5
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int m[TAM][TAM];
    int i, j;
    int resp;
    int soma = 0;

    // for(i = 0; i < TAM; i++)
    //     for(j = 0; j < TAM; j++) {
    //         printf("Digite o valor de m[%d][%d]", i, j);
    //         scanf("%d", &m[i][j]);
    //     }

    for(i = 0; i<8; i++) 
        for(j = 0; j<8; j++) {
            m[i][j] = (j * i);
        }

    while (1) {
    
        printf("\n**********MENU**********");

        printf("\n[1] Mostrar todos os elementos da matriz");
        printf("\n[2] Mostrar todos os elementos da quarta linha da matriz e da primeira coluna da matriz");
        printf("\n[3] Mostrar a soma dos elementos da diagonal principal");
        printf("\n[4] Atribuir o valor 0 para os valores negativos encontrados fora da diagonal principal");
        printf("\n[5] Buscar um elemento na matriz");

        printf("\n\nEscolha uma das opção acima:");
        scanf("%d", &resp);

        if(resp == 1) {

            printf("\nTodos os elementos da matriz: \n\n");

            for(i = 0; i < TAM; i++) {
                for(j = 0; j < TAM; j++) {
                    printf("%4d", m[i][j]);
                }
                printf("\n");
            }
        } else if(resp == 2) {
            printf("\nTodos os elementos da quarta linha da matriz: \n");

            for(i = 0; i < TAM; i++) {
                printf("%4d", m[3][i]);
            }
        } else if (resp == 3) {
            for(i = 0, j = 0; i < TAM; i++, j++) {
                soma+= m[i][j];
            }
            printf("\nA Soma dos elementos da diagonal principal: %d\n", soma);
        } else if(resp == 4) {
            for(i = 0; i < TAM; i++) {
                for(j = 0; j < TAM; j++) {
                    if(i != j) {
                        m[i][j] = 0;
                    }
                    printf("%4d", m[i][j]);
                }
                printf("\n");
            }
        } else if(resp == 5) {
            printf("Qual elemento deseja encontrar na matriz? \n");
            scanf("%d", &resp);

            soma = 0;

            for(i = 0; i < TAM; i++) 
                for(j = 0; j < TAM; j++) {
                    if(m[i][j] == resp) 
                        soma++;
                }
            if(soma > 0) {
                printf("\nSegue abaixo as posições do elemento desejado: \n");
                for(i = 0; i < TAM; i++) 
                    for(j = 0; j < TAM; j++) {
                        if(m[i][j] == resp) 
                            printf("\nm[%d][%d]", i, j);
                    }
                } else {
                    printf("Elemento não encontrado. Tente novamente.\n");
                }
            
        }
    }
    return 0;
}