#include <stdio.h>

int main()
{
    
    float cotacao, dolar, real;

    printf("Digite a cotacao do dolar:\n");
    scanf("%f", &cotacao);

    printf("Quantos dolares voce gostaria de converter para R$?\n");
    scanf("%f", &dolar);

    real = dolar * cotacao;
    printf("%.2f dolares equivalem a: R$ %.2f", dolar, real);

    return 0;
}
