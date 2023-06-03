const A = [[1, 2], [3, 4],[6,7]];
const B = [[5, 6], [7, 8],[9,10]];

// Define the result matrix as an empty 2D array with the same dimensions as the matrices being multiplied
const C = Array(A.length).fill().map(() => Array(B[0].length).fill(0));

function ofri(){
    // Multiply the matrices
for (let i = 0; i < A.length; i++) {
    for (let j = 0; j < B[0].length; j++) {
      for (let k = 0; k < B.length; k++) {
        C[i][j] += A[i][k] * B[k][j];
      }
    }
  }
  console.log(C);
}
