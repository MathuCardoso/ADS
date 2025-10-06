#include <stdio.h>

int main()
{
    float comp, larg, area, custoTotal, precoM2;

    printf("Qual o comprimento da sala?\n");
    scanf("%f", &comp);

    printf("Qual a largura da sala?\n");
    scanf("%f", &larg);

    printf("Qual o preço do m² para forrar o carpete?\n");
    scanf("%f", &precoM2);

    area = comp * larg;

    custoTotal = area * precoM2;

    printf("A area total da sala e de %.2f", area);

    printf("O custo total para forrar a sala de carpete será de: %.2f", custoTotal);

    return 0;
}
