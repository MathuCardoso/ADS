#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int m[8][8];
    int i, j;
    int maior = 0, menor = 0;
    int cMaior = 0, lMaior = 0, cMenor = 0, lMenor = 0;

    for(i = 0; i<8; i++) 
        for(j = 0; j<8; j++) {
            m[i][j] = (j * i);
        }


    for(i = 0; i<8; i++) 
        for(j = 0; j<8; j++) {
            
            if(i == 0 && j == 0) {
                menor = m[i][j];
                maior = m[i][j];
            } else{
                if(m[i][j] > maior) {
                    maior = m[i][j];
                    cMaior = j;
                    lMaior = i;
                } if(m[i][j] < menor) {
                    menor = m[i][j];
                    cMenor = j;
                    lMenor = i;
                }
            }   
        }

    printf("\nMatriz gerada:\n");
    for (i = 0; i < 8; i++) {
        for (j = 0; j < 8; j++) {
            printf("%3d ", m[i][j]);
        }
    printf("\n");
}

    printf("\nMaior: %d\n", maior);
    printf("Menor: %d\n", menor);
    printf("Posição maior: [%d][%d]\n", lMaior, cMaior);
    printf("Posição menor: [%d][%d]\n", lMenor, cMenor);

    

    return 0;
}