#include <stdio.h>

int main()
{
    float totalVendas, comissao;

    printf("Quantas vendas o vendedor realizou?\n");
    scanf("%f", &totalVendas);

    comissao = (totalVendas * 10) / 100;

    printf("A comissão do vendedor será de: %.2f", comissao);

    return 0;
}
