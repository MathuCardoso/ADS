#include <stdio.h>

int main()
{

    float n1, n2, n3, n4;

    printf("Digite o primeiro numero: ");
    scanf("%f", &n1);

    printf("Digite o segundo numero: ");
    scanf("%f", &n2);

    printf("Digite o terceiro numero: ");
    scanf("%f", &n3);

    printf("Digite o quarto numero: ");
    scanf("%f", &n4);

    float mh = 4 / (1/n1) + (1/n2) + (1/n3) + (1/n4);

    /* code */
    return 0;
}
