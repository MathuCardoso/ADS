#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int alunos[3];
    float notas[3][4] = {
        {8.0, 9.0, 8.0, 7.0},
        {9.0, 7.0, 6.0, 7.0},
        {5.0, 6.0, 7.0, 6.0}
    };
    int i, j;
    int soma = 0;

    for(i = 0; i < 3; i++) {
        for(j = 0; j < 4; j++) {
            soma+=notas[i][j];
        }
        alunos[i] = soma;
        soma = 0;
    }

    float media = 0;

    printf("\nALUNO NOTA1 NOTA2 NOTA3 NOTA4 MEDIA");
    for(i = 0; i < 3; i++) {
        printf("\n  %d ", i + 1);
        for(j = 0; j < 4; j++){
            printf("%6.2f", notas[i][j]);
        }
        media = alunos[i] / 4;
        printf("  %.2f", media);
    }

    float mediaGeral = 0;
    soma = 0;

    for(i = 0; i < 3; i++) {
        soma+=alunos[i];
    }

    mediaGeral = soma / 12;

    printf("\n\nMEDIA GERAL.......................: %.2f\n", mediaGeral);
    return 0;
}