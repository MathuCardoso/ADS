#include <stdio.h>
#include <math.h>

int main()
{

    int num, qua, cub;

    printf("Digite um numero: ");
    scanf("%d", &num);

    qua = pow(num, 2);
    cub = pow(num, 3);

    printf("Numero\tQuadrado\tCubo\n");
    printf("%d\t%d\t%d", num, qua, cub);


    /* code */
    return 0;
}
