#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    float divD = 1, divS = 1, result = 0;

    for(;divD <= 49; divD+=2, divS++) {

        printf("%.0f / %.0f\n", divD, divS);
        
        result+= divD / divS;
    }

    printf("Resultado da soma das divisões acima: %f", result);


    return 0;
}