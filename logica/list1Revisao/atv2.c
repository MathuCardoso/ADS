#include <stdio.h>

int main()
{
    int num, ante, suce;

    printf("Digite um numero: ");
    scanf("%d", &num);

    ante = num - 1;
    suce = num + 1;

    printf("O antecessor deste numero e: %d\n", ante);
    printf("E seu sucessor e: %d", suce);

    return 0;
}
