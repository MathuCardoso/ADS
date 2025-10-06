#include <stdio.h>

int main()
{
    int n1, n2, n2d;

    printf("Digite um numero: ");
    scanf("%d", &n1);

    printf("Digite outro numero: ");
    scanf("%d", &n2);

    printf("Valor da variavel 1 antes: %d\n", n1);
    n2d = n1;
    printf("Valor da variavel 2 antes: %d\n", n2);
    n1 = n2;

    n2 = n2d;

    printf("\nValor da variavel 1 depois: %d\n", n1);
    printf("Valor da variavel 2 depois: %d\n", n2);

    return 0;
}
