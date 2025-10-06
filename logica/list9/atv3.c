#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int linhas = 1, colunas = 1;
    int i, j;

    printf("Digite o número de linhas das matrizes M e N: ");
    scanf("%d", &linhas);

    printf("Digite o número de colunas das matrizes M e N: ");
    scanf("%d", &colunas);
    
    int m[linhas][colunas];
    int n[linhas][colunas];
    int c[linhas][colunas];

///////////////////////////////////////////////////////////

    for(i = 0; i<linhas; i++) 
        for(j = 0; j<colunas; j++) {
            m[i][j] = (j * i);
        }
    
    for(i = 0; i<linhas; i++) 
        for(j = 0; j<colunas; j++) {
            n[i][j] = (j * i) * 3;
        }


/////////////////////////////////////////////

    for(i = 0; i < linhas; i++)
        for(j = 0; j < colunas; j++) {
            c[i][j] = m[i][j] + n[i][j];
        }
    
    for(i = 0; i < linhas; i++) {
        for(j = 0; j < colunas; j++) {

            printf("%3d", c[i][j]);
    }
    printf("\n");
}

    return 0;
}