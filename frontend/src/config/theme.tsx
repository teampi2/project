import { createTheme } from '@mui/material'
import { green } from '@mui/material/colors'

const theme = createTheme({
  cssVariables: true,
  palette: {
    mode: 'light',
    primary: {
      main: green[600],
    },
  },
})

export default theme
