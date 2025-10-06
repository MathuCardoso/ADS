#include <stdio.h>

int main()
{
    
    float valorCompra, valorPrest;

    printf("Digite o valor da compra: ");
    scanf("%f", &valorCompra);

    valorPrest = valorCompra / 5;

    printf("Compra parcelada\n");
    printf("5 x %.2f = %.2f", valorPrest, valorCompra);
    
    

    return 0;
}
