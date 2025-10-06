#include <stdio.h>
#include <math.h>

int main()
{
    
    float number;

    printf("Digite um numero: ");
    scanf("%f", &number);

    double rq = sqrt(number);

    printf("%.2f", rq);

    return 0;
}
