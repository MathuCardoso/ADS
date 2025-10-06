#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    float m[3][3];
    int i, j;
    int linha;

    for(i = 0; i < 3; i++)
        for(j = 0; j < 3; j++){
            printf("Digite o valor da posição [%d][%d] da matriz\n", i, j);
            scanf("%f", &m[i][j]);
        }
    printf("Qual linha da matriz você gostaria de exibir?[0], [1] ou [2]");
    scanf("%d", &linha);

    for(i = 0; i<3;i++) {
        printf("[%.2f]   ", m[linha][i]);
    }
    

    return 0;
}