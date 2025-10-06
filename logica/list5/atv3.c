#include <stdio.h>
int main()
{
    int i = 1;
    int soma = 0;

    while (i <= 100)
    {   
        soma += i;
        i += 2;       
    }

    printf("%d", soma);
    
    
    return 0;
}


