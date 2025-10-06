#include <stdio.h>
int main()
{
    int i = 1, a = 1, b = 1, termo;

    printf("Abaixo os 15 primeiros termos da série de Fibonacci:\n");

    printf("%d, %d, ", a, b);

    while (i <= 13)
    {

        termo = a + b;

        printf("%d, ", termo);

        a = b;
        b = termo;


        i++;

    }
    
    
    return 0;
}
