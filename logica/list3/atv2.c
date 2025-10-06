#include <stdio.h>
int main()
{
    int num;

    while (1)
    {

    printf("Digite um numero: ");
    scanf("%d", &num);

    if(num % 3 == 0) {
        printf("%d e um numero multiplo de 3.\n\n", num);
    } else {
        printf("%d nao e multiplo de 3.\n\n", num);
    }

}

    
    return 0;
}
