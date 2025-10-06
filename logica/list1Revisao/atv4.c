#include <stdio.h>

int main()
{
    float base, altura, area;

    printf("Digite a altura do retangulo: ");
    scanf("%f", &altura);

    printf("Digite a base do retangulo: ");
    scanf("%f", &base);

    area = base * altura;

    printf("A area do retangulo e: %.2f", area);

    return 0;
}
