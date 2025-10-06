#include <stdio.h>

int main()
{
    float km, li, consumo;

    printf("Qual a ditancia percorrida (km)?\n");
    scanf("%f", &km);

    printf("Quanto de combustivel foi gasto (litros)?");
    scanf("%f", &li);

    consumo = km/li;

    printf("O consumo medio de combustivel do veiculo e de %.2fkm/l", consumo);

    return 0;
}
