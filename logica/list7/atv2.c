#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");

    float v = 0, vMax = 0, vMin = 0, mVal = 0, vMaior = 0, vMaiorContagem = 0;
    int i;

    for (i = 1; i <= 10; i++)
    {
        printf("\nDigite o %dº número: ", i);
        scanf("%f", &v);

        if(v > vMax)
            vMax = v;
        if(i == 1)
            vMin = v;
        else if(v < vMin)
            vMin = v;
        if(v > 5.9) {
            vMaior+=v;
            vMaiorContagem++;
        }
    }

        if (vMaiorContagem > 0)
            mVal = vMaior / vMaiorContagem;
        else
            printf("\nNenhum valor maior que 5,9 foi digitado.\n");

    printf("\nO valor máximo digitado foi: %.2f\n", vMax);
    printf("O valor mínimo digitado foi: %.2f\n", vMin);
    printf("A média dos valores maiores que 5,9 foi: %.2f\n", mVal);
    
    
    return 0;
}