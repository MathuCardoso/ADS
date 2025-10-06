#include <stdio.h>

int main()
{

    int n1, n2, n3;
    float media;

    printf("Digite um número:\n");
    scanf("%d", &n1);

    printf("Digite um número:\n");
    scanf("%d", &n2);

    printf("Digite um número:\n");
    scanf("%d", &n3);

    media = (float) (n1 + n2 + n3) / 3;
    
    printf("A media artimetica dos numeros digitados e: %.2f", media);

    /* code */
    return 0;
}
