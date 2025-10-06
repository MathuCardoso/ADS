#include <stdio.h>

int main()
{
    int n1, n2, adi, sub, mul, div;

    printf("Digite um numero: ");
    scanf("%d", &n1);

    printf("Digite outro numero: ");
    scanf("%d", &n2);

    adi = n1 + n2;
    sub = n1 - n2;
    mul = n1 * n2;
    div = n1 / n2;

    printf("%d + %d = %d\n", n1, n2, adi);

    printf("%d - %d = %d\n", n1, n2, sub);

    printf("%d x %d = %d\n", n1, n2, mul);

    printf("%d / %d = %d\n", n1, n2, div);

    return 0;
}
