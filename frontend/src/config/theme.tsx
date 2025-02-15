import { createTheme } from '@mui/material'
import { green, blue } from '@mui/material/colors'

const theme = createTheme({
  cssVariables: true,
  palette: {
    mode: 'light',
    primary: {
      main: green[600],
    },
    secondary: {
      main: blue[600],
    },
  },
})

export default theme
