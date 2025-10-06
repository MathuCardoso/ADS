#include <stdio.h>

int main()
{
    float valorTotal, desc10, acres5;

    printf("Informe o valor total de uma compra: ");
    scanf("%f", &valorTotal);

    desc10 = (valorTotal * 90) / 100;
    acres5 = (valorTotal * 105) / 100;

    printf("O valor da compra com um desconto de 10%% sera de: %.2f\n", desc10);

    printf("O valor da compra com um acrescimo de 5%% sera de %.2f\n", acres5);

    return 0;
}
