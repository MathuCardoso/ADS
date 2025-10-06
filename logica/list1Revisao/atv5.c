#include <stdio.h>

int main()
{
    float valorPago, precoProduto, troco;

    printf("Digite o valor pago: ");
    scanf("%f", &valorPago);

    printf("Digite o preco do produto: ");
    scanf("%f", &precoProduto);

    troco = valorPago - precoProduto;

    if(troco <= 0) {
        printf("O comprador nao recebera troco.");
    }
    else {
        printf("O troco a ser recebido sera %.2f", troco);
    }

    return 0;
}
