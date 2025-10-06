#include <stdio.h>
#include <math.h>
int main()
{
    int i = 1, quad, cub;

    while (i <= 10)
    {
        quad = pow(i, 2);
        cub = pow(i, 3);

        printf("O quadrado de %d: %d\n", i, quad);
        printf("O cubo de %d: %d\n\n", i, cub);

        i++;
    }
    

    return 0;
}
