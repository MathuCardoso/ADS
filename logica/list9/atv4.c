#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#define TAML 4
#define TAMC 5
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int m[TAML][TAMC], t[TAMC][TAML];
    int i, j;

    for(i = 0; i<TAML; i++) {
        for(j = 0; j<TAMC; j++) {
            m[i][j] = (j * i);
        }
    }

        for(i = 0; i < TAMC; i++)
            for(j = 0; j < TAML; j++){
                t[i][j] = m[j][i];
            }
    
    for (i = 0; i < TAMC; i++) {
        for (j = 0; j < TAML; j++) {
            printf("%3d ", t[i][j]);
        }
    printf("\n");
}

    return 0;
}