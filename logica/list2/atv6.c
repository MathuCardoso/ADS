#include <stdio.h>
#include <math.h>

int main()
{
    
    float num;

    printf("Digite um numero real: ");
    scanf("%f", &num);

    int arrCima = ceil(num);
    int arrBaixo = floor(num);

    printf("Numero digitado: %.2f\n", num);
    printf("Arredondado para baixo: %d\n", arrBaixo);
    printf("Arredondado para cima: %d\n", arrCima);

    return 0;
}
