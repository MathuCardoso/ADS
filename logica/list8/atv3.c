#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    int i = 0;
    int vetorX[] = {1,2,3,4,5};
    int vetorY[] = {6,7,8,9,10};
    int resultado = 0;

    for (; i < 5; i++) {

        resultado+=vetorX[i] * vetorY[i];

    }

    printf("%d", resultado);
    

    return 0;
}