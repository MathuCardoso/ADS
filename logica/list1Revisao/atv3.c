#include <stdio.h>

int main()
{
    float n1, n2, n3, n4, media;

    printf("Digite o primeiro numero: ");
    scanf("%f", &n1);

    printf("Digite o segundo numero: ");
    scanf("%f", &n2);

    printf("Digite o terceiro numero: ");
    scanf("%f", &n3);

    printf("Digite o quarto numero: ");
    scanf("%f", &n4);

    media = (n1 + n2 + n3 + n4) / 4;

    printf("A media desses 4 numeros e: %.2f", media);


    return 0;
}
