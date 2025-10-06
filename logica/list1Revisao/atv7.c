#include <stdio.h>

int main()
{
    float c, k, f;

    printf("Informe uma temperatura em Celsius: ");
    scanf("%f", &c);

    k = c + 273;
    f = 1.8 * (k - 273) + 32;

    printf("Escala de temperaturas\n");
    printf("%.1fC = %.1fF = %.1fK", c, f, k);

    return 0;
}
