#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main()
{
    int i = 1, calc;

    while (i <= 10)
    {
        
        calc = 6 * i;
        printf("6 x %d = %d\n", i, calc);

        i++;
    }
    

    return 0;
}
