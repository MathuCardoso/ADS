#include <stdio.h>

int main()
{
    int numeros, soma;

    printf("Digite um numero de 4 algarismos: ");
    scanf("%d", &numeros);

    soma = (numeros % 10000 / 1000) + (numeros % 1000 / 100) + ( numeros % 100 / 10) + (numeros % 10 / 1);

    printf("A soma dos algorismos e igual a: %d", soma);


    return 0;
}
