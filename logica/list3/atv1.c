#include <stdio.h>
int main()
{
    int num;

    while (1)
    {

    printf("Digite um numero: ");
    scanf("%d", &num);

    if (num > 0)
    {
        printf("%d e um numero positivo.\n", num);
    } else if(num < 0) {
        printf("%d e um numero negativo.\n", num);
    } else {
        printf("%d e um numero nulo.\n", num);
    }

}

    
    return 0;
}
